
<div>
    <form wire:submit.prevent="register">
        <div>
            <label for="username">Pseudo</label>
            <input wire:model="username" type="text" id="username" name="username" required>
            @error('username') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input wire:model="email" type="text" id="email" name="email" required>
            @error('email') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input wire:model="password" type="password" id="password" name="password" required>
            @error('password') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="passwordConfirm">Confirmation</label>
            <input wire:model="passwordConfirm" type="password" id="passwordConfirm" name="passwordConfirm" required>
            @error('passwordConfirm') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <input type="submit" value="Inscription">
        </div>
    </form>
</div>