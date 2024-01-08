@extends('admin.layouts.app')


@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Matches Create</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if (session('msg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('msg') }}
                            </div>
                        @endif
                            {{ $errors ?? dd($errors->all()) }}
                            <form role="form" method="POST"
                                action="{{ route('admin.matches.update', ['id' => $matches->match_id]) }}">
                                @method('POST')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="home_team">Home Team</label>
                                        <input value="{{ $matches->home_team }}" type="text" name="home_team"
                                            class="form-control" id="home_team" placeholder="Enter home team">
                                        @error('home_team')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                        <label for="home_name_slug">Home Team Slug</label>
                                        <input value="{{ $matches->home_name_slug }}" type="text" name="home_name_slug"
                                            class="form-control" id="home_name_slug" placeholder="Enter home team slug">
                                        @error('home_name_slug')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                        <label for="away_team">Away Team</label>
                                        <input value="{{ $matches->away_team }}" type="text" name="away_team"
                                            class="form-control" id="away_team" placeholder="Enter away team">
                                        @error('away_team')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                        <label for="away_name_slug">Away Team Slug</label>
                                        <input value="{{ $matches->away_name_slug }}" type="text" name="away_name_slug"
                                            class="form-control" id="away_name_slug" placeholder="Enter away team slug">
                                        @error('away_name_slug')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js-custom')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#home_team').on('input', function() {
                updateSlug('home_team', 'home_name_slug');
            });

            $('#away_team').on('input', function() {
                updateSlug('away_team', 'away_name_slug');
            });

            function updateSlug(nameInputId, slugInputId) {
                var nameValue = $('#' + nameInputId).val();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.matches.createSlug') }}',
                    data: {
                        name: nameValue,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#' + slugInputId).val(response.slug);
                    }
                });
            }
        });
    </script>
@endsection
