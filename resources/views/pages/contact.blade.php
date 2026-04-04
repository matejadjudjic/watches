@extends("layouts/app")

@section('title', 'Contact')

@section('content')

    <div class="men">
        <div class="container">
            <div class="grid_1">
                <h1>Contact Info</h1>
                <p>We are here to help you find the perfect timepiece that matches your style and needs. Whether you have questions about our collections, need assistance with your order, or want expert advice on choosing the right watch, our team is always ready to assist you. We take pride in offering high-quality watches, from luxury brands to everyday essentials, ensuring precision, durability, and timeless design.</p>
            </div>
            <div class="grid_4">
                <div class="grid_2 preffix_1">
                    <ul class="iphone">
                        <i class="phone"> </i>
                        <li class="phone_desc">Phone : +1 800 245 2365 </li>
                        <div class="clearfix"> </div>
                    </ul>
                    <ul class="iphone">
                        <i class="flag"> </i>
                        <li class="phone_desc">Website : <a href="mailto:mail@demolink.org">www.demolink.com</a></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
                <div class="grid_3">
                    <ul class="iphone">
                        <i class="msg"> </i>
                        <li class="phone_desc">Email : <a href="mailto:mail@demolink.org">mail(at)watches.com</a> </li>
                        <div class="clearfix"> </div>
                    </ul>
                    <ul class="iphone">
                        <i class="home"> </i>
                        <li class="phone_desc">Address : vel illum dolore eu feugiat nulla </li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="contact_form">
                <h2>Feedback</h2>
                <form>
                    <div class="col-md-6 to">
                        <input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
                        <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
                        <input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
                    </div>
                    <div class="col-md-6 text">
                        <textarea value="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                    </div>
                    <div class="clearfix"></div>
                    <div class="but__center"><input type="submit" value="Send message &gt;&gt;"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
    </div>

@endsection
