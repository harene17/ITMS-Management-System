<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('welcome.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:lightgray">
<img src="{{ asset('images/UNITEN.png') }}" alt="UNITEN Logo" style="width: 190px; position: absolute; top: 0; left: 2%;">
<div class="container"><br>
            <div class="text-end">
                @if (Route::has('login'))
                    <div>
                        @auth
                           <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
                        @else
                            <a href="{{ route('login') }}" style="border-color:black" class="btn btn-warning">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" style="border-color:black" class="btn btn-info">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <div class="animation01">
        <div class="rhombus_small">
            <div class="rhombus">
                <div class="border_box">
                    <span class="line line01"></span>
                    <span class="line line02"></span>
                    <span class="line line03"></span>
                    <span class="line line04"></span>
                    <span class="circle circle01"></span>
                    <span class="circle circle02"></span>
                    <span class="circle circle03"></span>
                    <span class="circle circle04"></span>
                    <span class="animation_line animation_line01"></span>
                    <span class="animation_line_wrapper animation_line02_wrapper"><span class="animation_line animation_line02"></span></span>
                    <span class="animation_line animation_line03"></span>
                    <span class="animation_line_wrapper animation_line04_wrapper"><span class="animation_line animation_line04"></span></span>
                    <span class="animation_line animation_line05"></span>
                    <span class="animation_line_wrapper animation_line06_wrapper"><span class="animation_line animation_line06"></span></span>
                    <span class="animation_line animation_line07"></span>
                    <span class="animation_line_wrapper animation_line08_wrapper"><span class="animation_line animation_line08"></span></span>
                </div>
                <div class="wave">
                    <div class="wave_wrapper"><div class="wave_box"></div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="animation02">
        <div class="rhombus_box">
            <span class="rhombus_item_wrapper rhombus_item01_wrapper"><span class="rhombus_item"></span></span>
            <span class="rhombus_item_wrapper rhombus_item02_wrapper"><span class="rhombus_item"></span></span>
        </div>
        <div class="double_content">
            <div class="double_wrapper02 dotted02"><div class="dotted_hide"><div class="double_wrapper01 dotted01"><span class="dotted_right"></span></div></div></div>
            <div class="double_wrapper02 white02"><div class="double_wrapper01 white01"></div></div>
            <div class="double_wrapper02 gray02"><div class="double_wrapper01 gray01"></div></div>
            <div class="double_wrapper02 orange02"><div class="double_wrapper01 orange01"></div></div>
        </div>
        <div class="name">
            <p> ITMS Project Management </p>
            <span class="name_circle01"></span>
            <span class="name_circle02"></span>
        </div>
    </div>
</div>

</body>
</html>
