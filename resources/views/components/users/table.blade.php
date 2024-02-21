@props(['users'])

<style>
  table {
    font-size: 20px; /* Adjust the font size for the entire table */
  }

  table th, table td {
    font-size: 20px; /* Adjust the font size for header cells and data cells */
  }
</style>
@if ($users->isEmpty())
  <div class="pt-3 pb-2">
    <h4 class="text-muted">No users found.</h4>
  </div>
@else
  <div class="table-responsive" style="margin-top: 20px; border: 1px rgb(72, 70, 70) solid;">
    <table class="table-hover  table align-middle ">
      <thead class="table-success">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone number</th>
          <th>Address</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->roles->first()->title }}</td>
            <td>
              <div class="d-flex gap-1">
                @can('view', $user)
                  <x-buttons.anchor :href="route('users.show', $user)" content="Show" size="small" color="primary" />
                @endcan
                @can('update', $user)
                  <x-buttons.anchor :href="route('users.edit', $user)" content="Edit" size="small" color="warning" />
                @endcan
                @can('delete', $user)
                  <x-buttons.form :action="route('users.destroy', $user)" content="Delete" size="small" color="danger" />
                @endcan
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $users->links() }}
@endif
