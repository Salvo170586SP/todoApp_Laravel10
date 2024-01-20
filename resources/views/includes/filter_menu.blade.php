<div class="col-12 offset-md-3 col-md-6 mt-4">
    <div class="p-2">
        <a class="btn rounded-4 btn-outline-secondary fw-semibold   {{ (Request::url() === 'http://127.0.0.1:8000') ? 'active' : ''  }}" href="{{ route('posts.index') }}">All</a>
        <a class="btn rounded-4 btn-outline-secondary fw-semibold   {{ (Request::url() === 'http://127.0.0.1:8000/getCompleted') ? 'active' : ''  }}" href="{{ route('getCompleted') }}">Completed</a>
        <a class="btn rounded-4 btn-outline-secondary fw-semibold   {{ (Request::url() === 'http://127.0.0.1:8000/getIncompleted') ? 'active' : ''  }}" href="{{ route('getIncompleted') }}">Incompleted</a>
    </div>
</div>
