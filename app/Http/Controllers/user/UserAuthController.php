<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\JoinMemberMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;

use function Symfony\Component\Clock\now;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan!');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password tidak sesuai!');
        }

        if ($user->role === 'user') {
            Auth::login($user);

            return redirect()->route('user.dashboard');
        }

        return back()->with('error', 'Role tidak sesuai!');
    }

    public function register()
    {
        return view('user.auth.register');
    }

    public function prosesRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'jkl' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jkl' => $request->jkl,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('user.dashboard');
    }

    public function joinMember()
    {
        $user = User::find(Auth::id());
        return view('user.auth.member', compact('user'));
    }

    public function prosesJoinMember()
    {
        $user = User::find(Auth::id());

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'myrecipes400@gmail.com';
            $mail->Password = 'jxuo povc yfoj ddlq';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('myrecipes400@gmail.com', 'Join Member in My Recipes Apps');
            $mail->addAddress($user->email);

            $activation_link = url('/join-member/activation?token=' . encrypt($user->id));

            $mail->isHTML(true);
            $mail->Subject = 'Aktivasi Akun Anda untuk menjadi member';
            $mail->Body = '
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <title>Aktivasi Akun</title>
                </head>
                <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin:0; padding:20px;">

                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="center">
                                <table width="600" style="background:white; padding:20px; border-radius:10px;">
                                    <tr>
                                        <td style="text-align:center;">
                                            <h2 style="color:#4CAF50;">My Recipes Apps</h2>
                                            <p style="color:#555; font-size:16px;">
                                                Halo, <strong>' . $user->nama . '</strong> 👋
                                            </p>
                                            <p style="color:#555; font-size:15px;">
                                                Klik tombol verifikasi di bawah untuk bergabung:
                                            </p>

                                            <a href="' . $activation_link . '" 
                                                style="
                                                    display:inline-block;
                                                    background:#4CAF50;
                                                    color:white;
                                                    padding:12px 25px;
                                                    margin-top:15px;
                                                    text-decoration:none;
                                                    border-radius:6px;
                                                    font-size:16px;
                                                    font-weight:bold;
                                                ">
                                                Aktifkan Akun
                                            </a>

                                            <p style="margin-top:25px; color:#777; font-size:14px;">
                                                Jika tombol tidak berfungsi, klik link berikut:
                                            </p>

                                            <p style="word-break: break-all; color:#4CAF50; font-size:14px;">
                                                ' . $activation_link . '
                                            </p>

                                            <hr style="margin:30px 0; border:0; border-top:1px solid #eee;"/>

                                            <p style="color:#999; font-size:13px;">
                                                Email ini dikirim otomatis, mohon tidak membalas.
                                            </p>
                                            <p style="color:#999; font-size:13px;">
                                                &copy; ' . date("Y") . ' My Recipes Apps
                                            </p>

                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>
                ';

            $mail->send();
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Message could not be sent. Mailer Error:".$mail->ErrorInfo);
        }

        return redirect()->back()->with('success', 'Email verifikasi telah dikirim!');
    }

    public function aktivasiMember(Request $request){
        $user = User::find(decrypt($request->token));
        if(!$user){
            return redirect()->route('user.auth.login')->with('error', 'Token tidak valid');
        }

        $user->status = 'member';
        $user->tgl_daftar = now();
        $user->save();

        return view('user.auth.success-join');
    }
}
