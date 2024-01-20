<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .active>.page-link {
            background: gray !important;
            border-color: gray !important;
            color: white !important;
        }

        .page-link {
            color: black !important;
            border-radius: 20px !important;
            margin: 0 5px 0 0 !important;
            width: 50px !important;
            height: 50px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
             font-weight: bolder !important; 
        }

        .page-link:focus {
            box-shadow: none !important;
        }

    </style>
</head>
<body>
    @include('includes.header')

    <main style="max-height: 100vh">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-md-3 col-md-6 mt-3 mb-1 d-flex justify-content-center align-items-center">
                    {{-- CREATE --}}
                    <button type="button" class="btn btn-secondary py-2 px-4 fs-4 rounded-5 fw-semibold"   data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-plus"></i> Add
                    </button>
                    <!-- Modal -->
                    <div class="modal fade shadow" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-4">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title text-muted fw-semibold" id="exampleModalLabel">Add to-do</h5>
                                    <button type="button" style="color: white !important" class="btn-close bg-outline-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="my-2">
                                                <label class="form-label fw-semibold text-muted mb-1" for="">Title</label>
                                                <input type="text" name="title" class="form-control fw-semibold py-2  rounded-3" required>
                                            </div>
                                            <div class="my-2">
                                                <label for="" class="form-label fw-semibold text-muted mb-1">Description</label>
                                                <textarea name="description" rows="5" class="form-control fw-semibold rounded-3"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFileSm" class="form-label text-muted fw-semibold">Add image</label>
                                            <input class="form-control fw-semibold form-control-sm rounded-2" name="image" id="formFileSm" type="file">
                                        </div>

                                        <button type="submit" class="btn btn-secondary rounded-5 fw-semibold">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('includes.filter_menu')
                <div class="col-12 offset-md-3 col-md-6">
                    @if(count($posts) > 0)
                    <div class="p-2 mt-2  mb-3  ">
                        <a class="btn btn-sm btn-secondary  py-2 px-4 fw-semibold rounded-4   {{ (Request::route() === '/selectAll') ? 'active' : '' }}" href="{{ route('selectAll') }}"><i class="fa-solid fa-circle-check me-1"></i> Select all</a>
                        <a class="btn btn-sm btn-secondary rounded-4 py-2 px-4 fw-semibold    {{ (Request::route() === '/deselectAll') ? 'active' : '' }}" href="{{ route('deselectAll') }}"><i class="fa-regular fa-circle-check me-1"></i> Unselect all</a>
                    </div>
                    @endif
                    @foreach($posts as $post)
                    <div class="shadow-sm border border-slate rounded-4 mb-3 p-3  ">
                        <div class="row">
                            <div class="col-1 d-flex align-items-center ">
                                <a href="{{ route('checkTodo', $post->id) }}"  class="m-0 p-0">
                                    @if ($post->is_checked === 0)
                                    <i class="fa-regular fa-circle-check text-secondary "></i>
                                    @else
                                    <i class="fa-solid fa-circle-check text-secondary "></i>
                                    @endif
                                </a>

                            </div>
                            <div class="col-2  d-flex justify-content-start  ">
                                @if (!$post->img_path)
                                <figure style="width: 50px; height: 50px" class="m-0 p-0">
                                    <img class="rounded-5" style="width: 100%; height: 100%; object-fit:cover" src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" alt="placeholder">
                                </figure>
                                @else
                                <figure style="width: 50px; height: 50px" class="m-0 p-0">
                                    <img class="rounded-5" style="width: 50px; height: 50px; object-fit:cover" src="{{ asset('storage') . '/' . $post->img_name }}" alt="{{ $post->description }}" {{-- width="80" --}}>
                                </figure>
                                @endif
                            </div>
                            <div class="col-4 d-flex align-items-center">
                                <p class="fw-semibold text-muted  {{ $post->is_checked == 1 ? 'text-decoration-line-through' : '' }}">
                                    {{ Str::limit($post->title, 10)  }}</p>
                            </div>
                            <div class="col-5">
                                <div class="d-flex justify-content-end">
                                    {{-- SHOW --}}
                                    <button class="btn border-0 px-0" data-bs-toggle="modal" data-bs-target="#exampleModal3-{{ $post->id }}">
                                        <i class="fa fa-eye bg-secondary rounded-5 p-2 text-white"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal3-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog-scrollable">
                                            <div class="modal-content rounded-4">
                                                <div class="modal-header border-0">
                                                    <h2 class="modal-title fs-5 text-muted fw-semibold" id="exampleModalLabel">
                                                        {{ Str::limit($post->title, 25)  }}
                                                    </h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if (!$post->img_path)
                                                    <img class="rounded-5 border w-100" src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" alt="placeholder">
                                                    @else
                                                    <img class="rounded-5 border w-100" src="{{ asset('storage') . '/' . $post->img_name }}" alt="{{ $post->description }}">
                                                    @endif
                                                    <div class="my-3">
                                                        <p class="fw-semibold " style="word-wrap: break-word;">{{ $post->description }}</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary rounded-5 fw-semibold" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- EDIT --}}
                                    <button class="btn border-0 px-0 px-2" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $post->id }}">
                                        <i class="fa-solid fa-pencil bg-secondary rounded-5 p-2 text-white"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel1-{{ $post->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-4">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title text-muted" id="exampleModalLabel-{{ $post->id }}">Edit to-do</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <div class="my-2">
                                                                <label for="title" class="form-label text-muted mb-1 fw-semibold">Title</label>
                                                                <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control my-2 rounded-2 fw-semibold">
                                                            </div>
                                                            <div class="my-2">
                                                                <label for="description" class="form-label mb-1 text-muted fw-semibold">Description</label>
                                                                <textarea name="description" rows="5" class="form-control rounded-2 fw-semibold">{{ old('description', $post->description) }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="formFileSm" class="form-label text-muted fw-semibold">Add image</label>
                                                            <input class="form-control form-control-sm" name="image" id="formFileSm-{{ $post->id }}" type="file">
                                                        </div>
                                                        <button type="submit" class="btn btn-secondary rounded-5 fw-semibold">Edit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- DELETE --}}
                                    <button class="btn border-0 px-0" data-bs-toggle="modal" data-bs-target="#exampleModal2-{{ $post->id }}">
                                        <i class="fa-solid fa-trash bg-danger rounded-5 p-2 text-white"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel2-{{ $post->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-4">
                                                <div class="modal-header border-0">
                                                    <div class=" ">
                                                        <h5 class="fw-semibold text-muted" id="exampleModalLabel2">Are you sure you want to delete the note?</h5>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <div>
                                                            <button type="submit" class="btn btn-danger rounded-5 fw-semibold">Delete</button>
                                                            <button type="button" class="btn btn-secondary rounded-5 fw-semibold" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 text-center my-5 fw-semibold">
                        @if(count($posts) == 0) <h2 style="color: gray"><i class="fa fa-edit"></i> Added To-Do </h2> @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>
