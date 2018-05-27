<h6 class="p-3">{{$title}}</h6>


@foreach($items as $item)
    <a class="d-flex align-items-center p-3 {{Request::url() == URL::to($item->url) ? "selected" : ""  }}" href="{{ URL::to($item->url) }}">
        <i class="{{$item->icon}}" ></i>
        <p>{{$item->libelle}}</p>
    </a>

@endforeach
