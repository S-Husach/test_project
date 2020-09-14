<!-- @props(['name'])
 -->

      <div class="card mb-4 p-0 shadow-sm container text-center">
        <div class="card-header">
          <h4>{{ $name }}</h4>
        </div>
        <div class="card-body">
          <h1 {{ $attributes }}></h1>
          <small class="widget_max_name text-muted"></small>
          <div class="spinner_max spinner-border text-primary">
            <span class="sr-only"></span>
          </div>
        </div>
      </div>