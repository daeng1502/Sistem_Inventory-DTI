<form action="{{ route('user.create') }}" method="post">
  @csrf

  <label for="name">Nama:</label>
  <input type="text" name="name" id="name" required>

  <label for="email">Email:</label>
  <input type="email" name="email" id="email" required>

  <label for="password">Password:</label>
  <input type="password" name="password" id="password" required>

  <label for="role">Role:</label>
  <select name="role" id="role">
    <option value="admin">Admin</option>
    <option value="user">User</option>
  </select>

  <button type="submit">Buat User</button>
</form>