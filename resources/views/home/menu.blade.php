<h2 class="w-100 border-bottom pb-3" style="border-bottom: 1px solid #c2c2c2">{{$title}}</h2>

@foreach($items as $item)
    <a class="col-md-4" href="{{ URL::to($item->url) }}">
        <div class="row my-4">
            <div class="col-3"><i class="{{$item->icon}} fa-4x text-dark" ></i></div>
            <div class="col-8">
                <h4>{{$item->libelle}}</h4>
                <p>{{$item->details}}</p>
            </div>
        </div>
    </a>
@endforeach