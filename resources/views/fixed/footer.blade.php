<div class="footer">
    <div class="container">
        <div class="newsletter">
            <h3>Newsletter</h3>
            <p>Stay updated with the latest watch releases, exclusive offers, and timeless styles. Subscribe and never miss a moment.</p>
            <form>
                <input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                <input type="submit" value="SUBSCRIBE">
            </form>
        </div>
        <div class="cssmenu">
            <ul>
                @foreach($menus as $menu)
                    <li>
                        <a href="{{ $menu->path }}" class="color2">{{ $menu->title }}</a>
                    </li>
                @endforeach

                <li><a href="https://docs.google.com/document/d/1Yl2uYvoI6FEfJ5sTkdLCgEYxHYuH6Bf5a-iDZGiI00Y/edit?tab=t.0">Dokumentation</a></li>
            </ul>
        </div>
        <ul class="social">
            <li><a href=""> <i class="instagram"> </i> </a></li>
            <li><a href=""><i class="fb"> </i> </a></li>
            <li><a href=""><i class="tw"> </i> </a></li>
        </ul>
        <div class="clearfix"></div>
        <div class="copy">
            <p> &copy; 2026 Watches. All Rights Reserved | Design by <a href="{{ route('home') }}" target="_blank">Watches/<a></p>
        </div>
    </div>
</div>
</body>

