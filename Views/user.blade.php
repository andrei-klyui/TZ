@section('title')
    User
@endsection

@section('content')

    <div class="container">
        <div>
            <form method="post" action="{{ route('create', $id->id) }}">
                {{ csrf_field() }}
                <p>{{ $user->name }}</p>
                <select name="aboniments">
                    <option>select aboniments</option>
                    <option value="#1">#1</option>
                    <option value="#2">#2</option>
                </select>
                <select name="tarif">
                    <option>select tarif</option>
                    <option value="#1">#1</option>
                    <option value="#2">#2</option>
                </select>
                <button type="submit" class="btn">Add</button>
            </form>
        </div>
    </div>

@endsection