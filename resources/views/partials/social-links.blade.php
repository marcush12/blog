<div class="buttons-social-media-share">
                <ul class="share-buttons">
                  <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&title={{$description}}" title="Compartilhar no Facebook" target="_blank"><img alt="Compartilhar no Facebook" src="/img/flat_web_icon_set/Facebook.png"></a></li>
                  <li><a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{$post->title}}&via=marcos012santos&hashtags={{config('app.name')}}" target="_blank" title="Tweet"><img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png"></a></li>
                  <li><a href="https://plus.google.com/share?url={{ request()->fullUrl() }}" target="_blank" title="Share on Google+"><img alt="Compartilhar no Google+" src="/img/flat_web_icon_set/Google+.png"></a></li>
                  <li><a href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&description={{$post->title}}" target="_blank" title="Pin it"><img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png"></a></li>
                </ul>
              </div>
