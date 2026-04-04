@extends('layouts.app')

@section('title', 'About Me')

@section('content')
    <div class="men">
        <div class="container">


            <div style="text-align:center; padding: 50px 0; border-bottom: 1px solid #ddd; margin-bottom: 40px;">
                <h1 style="font-size: 36px; letter-spacing: 2px;">ABOUT ME</h1>
                <p style="color: #888; font-size: 16px;">The person behind Watches Shop</p>
            </div>

            <div class="row" style="margin-bottom: 50px; align-items: center;">

                <div class="col-md-6">
                    <div style="background: #f9f9f9; padding: 40px;">
                        <h3 style="border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px;">Personal Info</h3>
                        <table style="width: 100%; line-height: 2.5;">
                            <tr>
                                <td style="color: #888; width: 40%;">Full Name</td>
                                <td><strong>Mateja Djudjic</strong></td>
                            </tr>
                            <tr>
                                <td style="color: #888;">Year of Birth</td>
                                <td><strong>2003</strong></td>
                            </tr>
                            <tr>
                                <td style="color: #888;">Index</td>
                                <td><strong>79/22</strong></td>
                            </tr>
                            <tr>
                                <td style="color: #888;">Current Location</td>
                                <td><strong>Belgrade, Serbia</strong></td>
                            </tr>
                            <tr>
                                <td style="color: #888;">Education</td>
                                <td><strong>High ICT School, Belgrade</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="col-md-6" style="display: flex; justify-content: center;">
                    <img src="{{ asset('images/ja.jpeg') }}" alt="About Me Image" class="img-fluid" style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                </div>
            </div>

        </div>
    </div>
@endsection
