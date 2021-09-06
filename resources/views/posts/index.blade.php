@extends('layout.app')
@section('content')

    <div class="row d-flex justify-content-center">
            <div class="col-10">
            <button class="btn btn-success mt-2" role="status" data-bs-toggle="modal" data-bs-target="#create">Add task</button>
                <br>
                <br>
                <table class="table table-striped table-hower table-success text-center">
                    <thead class="table-dark">
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>
                                <button href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $post->id; ?>">Edit</button>
                                <button href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $post->id; ?>">Delete</button>
                            </td>
                        </tr>
                        <!-- Modal edit-->
                        <div class="modal fade" id="edit<?= $post->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('posts.update',$post->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                            <div class="form-group">
                                                <small>Title</small>
                                                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                                            </div>
                                            <div class="form-group">
                                                <small>Description</small>
                                                <input type="text" class="form-control" name="description" value="{{ $post->description }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="edit" class="btn btn-success">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal edit-->
                        <!-- Modal delete-->
                        <div class="modal fade" id="delete<?= $post->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete? {{ $post->title }}</h5>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal delete-->
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal create-->
                <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add task</h5>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('posts.store') }}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <small>Title</small>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <small>Description</small>
                                        <input type="text" class="form-control" name="description">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="add" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal create-->
            </div>
        </div>

@endsection