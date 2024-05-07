 @if(isset($data['activities']))
               
          @foreach($data['activities'] as $activity)
            <div class="col-lg-3 py-1 px-1" data-aos="fade-up">
              <div class="sec-3-img">
                <img
                  src="http://web.way2village.in/public/images/activity/{{$activity->banner_image}}"
                  alt=""
                />
                <div class="overlay text-start px-3 py-3">
                  <div class="trek">
                    <h5>{{$activity->name}}</h5>
                    <p>{{$activity->description}}</p>
                  </div>
                  <div class="trek-1 w-100 d-flex justify-content-between align-items-center">
                    <p style="color: #fff;margin: 0;"><span>INR</span> {{$activity->default_price}}</p>
                    <a href="{{route('activity.details',['id'=>base64_encode($activity->id)])}}"><button type="button" class="sec-3-btn">View More</button></a>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
@endif