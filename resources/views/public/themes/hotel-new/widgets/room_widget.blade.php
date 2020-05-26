<div class="col s12 l4">
    <a href="{{route('home.item.show' , ['type'=>'room' , 'id'=>$data->id])}}">
        <div class="card small" style="border-top-right-radius: 10px !important;  border-top-left-radius: 10px !important;">
            <div class="card-image" style="border-top-right-radius: 10px !important;  border-top-left-radius: 10px !important;">
                @if(isset($data->properties['featuring-image']->value[0]->value))
                    <img src="{{$data->properties['featuring-image']->value[0]->value}}" alt="{{$data->properties['title']->value}}">
                @elseif(isset($data->properties['slide-images']->value[0]->value))
                    <img src="{{$data->properties['slide-images']->value[0]->value}}" alt="{{$data->properties['title']->value}}">
                @else
                    <img src="{{asset('images/post1.jpg')}}" alt="{{$data->title}}">
                @endif
            </div>
            <div class="card-content">
                <h6>
                    {{$data->title}}
                </h6>
                <p class="red-text">
                    {{__('layout.room.price per night')}}
                    @isset($data->properties['price']->value)
                        @if(count($data->properties['price']->value[$current_date]) == 2
                        &&  $data->properties['price']->value[$current_date][0] < $data->properties['price']->value[$current_date][1] )
                            {{number_format($data->properties['price']->value[$current_date][0])}}
                            <s style="color: lightgrey">
                                {{number_format($data->properties['price']->value[$current_date][1])}}
                            </s>
                        @elseif(count($data->properties['price']->value) == 1)
                            {{isset($data->properties['price']->value[$current_date][0]) ? number_format($data->properties['price']->value[$current_date][0]) : '0'}}
                        @endif
                    @endisset
                    {{__('layout.room.tooman')}}
                </p>
                <a class="orange-text" href="{{route('home.item.show' , ['type'=>'room' , 'id'=>$data->id])}}">
                    {{__('layout.room.more information')}}
                </a>

            </div>
        </div>
    </a>
</div>
