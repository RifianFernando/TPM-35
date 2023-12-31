<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pertemuan 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="https://youtube.com">Youtube</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">
                            <p>{{ $message }}</p>
                        </a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="image-home">
        {{-- <img src="../../public/img/House-ServerInfo.jpg" alt=""> --}}
        <p>Bila ingin menambah book bisa click button dibawah ini</p>
        <a href="/create-book" class="btn btn-dark">Create Button</a>
        <form action="{{ route('SendMail') }}" method="post">
            @csrf
            <button class="btn btn-dark">
                Send Email Button Button
            </button>
        </form>
    </div>

    <div>
        <p>List semua data book di database</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">book image</th>
                    <th scope="col">book name</th>
                    <th scope="col">author name</th>
                    <th scope="col">delete</th>
                    <th scope="col">update</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($list_book as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>
                            <img src="{{ asset('storage/' . $book->book_image_path) }}" style="width: 20%;"
                                alt="">
                        </td>
                        <td>{{ $book->book_name }}</td>
                        <td>{{ $book->author->author_name }}</td>
                        <th>
                            <form action="/delete-book/{{ $book->id }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete
                                </button>
                            </form>
                        </th>
                        <th>
                            <a type="button" class="btn btn-warning"
                                href="/update-book-page/{{ $book->id }}">Update</a>
                        </th>
                    </tr>
                @empty
                    <p>Maaf buku tidak ada</p>
                @endforelse
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
