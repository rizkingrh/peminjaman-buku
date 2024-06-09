<div>
    <form>
        <label>UID : </label>
        <input type="text" readonly value="{{ $data->encoded_id }}">
    </form>
    <button wire:click="refreshData">Update Data</button>
    {{-- <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->encoded_id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
            @endforeach
        </tbody>
    </table> --}}
</div>
