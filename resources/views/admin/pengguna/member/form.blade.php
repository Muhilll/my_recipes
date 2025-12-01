{{-- User --}}
<div class="form-group">
    <label>User</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fas fa-user"></i>
            </div>
        </div>
        <select name="user_id" class="form-control" required>
            <option value="">-- Pilih Member --</option>
            @foreach ($dataUser as $user)
                <option value="{{ $user->id }}">{{ $user->nama }} - ({{ $user->email }})</option>
            @endforeach
        </select>
    </div>
</div>
