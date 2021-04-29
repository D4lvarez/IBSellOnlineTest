<tbody id="table-body">
    @forelse ($data as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>
                <img src="{{ asset('storage/' . $user->image) }}" class="img-thumbnail" alt="{{ $user->username }}"
                    style="height: 100px; width:100px;" />
            </td>

        </tr>
    @empty
        <tr>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ups!</strong> Not data yet.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </tr>
    @endforelse
</tbody>
