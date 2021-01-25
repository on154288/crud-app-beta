@extends('layout')

@section('content')
    <!DOCTYPE html>
    <html>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * {
                box-sizing: border-box
            }

            /* Set height of body and the document to 100% */
            body,
            html {
                height: 100%;
                margin: 0;
                font-family: Arial;
            }

            /* Style tab links */
            .tablink {
                background-color: #555;
                color: white;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                font-size: 17px;
                width: 25%;
            }

            .tablink:hover {
                background-color: #777;
            }

            /* Style the tab content (and add height:100% for full page content) */
            .tabcontent {
                color: black;
                display: none;
                padding: 100px 20px;
                height: 100%;
            }

            #Home {
                background-color: lightpink;
                border: solid;
            }

            #News {
                background-color: lightgreen;
                border: solid;
            }

            #Contact {
                background-color: lightblue;
                border: solid;
            }

            #About {
                background-color: lightsalmon;
                border: solid;
            }

            .searchBox {
                position: absolute;
                left: 50%;
                transform: translate(-50%, 50%);
                background: #2f3640;
                height: 40px;
                border-radius: 40px;
                padding: 0px;

            }

            .searchBox:hover>.searchInput {
                width: 240px;
                padding: 0 6px;
            }

            .searchBox:hover>.searchButton {
                background: white;
                color: #2f3640;
            }

            .searchButton {
                color: white;
                float: right;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: #2f3640;
                display: flex;
                justify-content: center;
                align-items: center;
                transition: 0.4s;
            }

            .searchInput {
                border: none;
                background: none;
                outline: none;
                float: left;
                padding: 0;
                color: white;
                font-size: 16px;
                transition: 0.4s;
                line-height: 40px;
                width: 0px;

            }

            @media screen and (max-width: 620px) {
                .searchBox:hover>.searchInput {
                    width: 150px;
                    padding: 0 6px;
                }
            }

        </style>
    </head>

    <body>

        <button class="tablink" onclick="openPage('Home', this, 'red')">Home</button>
        <button class="tablink" onclick="openPage('News', this, 'green')" id="defaultOpen">News</button>
        <button class="tablink" onclick="openPage('Contact', this, 'blue')">Contact</button>
        <button class="tablink" onclick="openPage('About', this, 'orange')">About</button>

        <div id="Home" class="tabcontent">
           <form action="/search" method="get">
                <div class="searchBox">
                    <input class="searchInput" type="text" name="search" placeholder="Search">
                    <button class="searchButton" href="{{ url('/search')}}">
                        <i class="material-icons">
                            search
                        </i>
                    </button>
                </div>
            </form>

            <div class="table-content">

                <table class="table table-bordered table-dark" style="margin-top:100px">
                    <thead class="thead-dark">
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Author</td>
                            <td>Description</td>
                            <td>From Series</td>
                            <td>Country</td>
                            <td>Avaliable</td>
                            <td class="text-center">Action</td>
                        </tr>
                    <tbody>

                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->desc }}</td>
                                <td>{{ $book->series }}</td>
                                <td>{{ $book->country }}</td>
                                @if ($book->avaliable == 1)
                                    <td>Yes</td>
                                @else
                                    <td>No</td>
                                @endif

                                <td class="text-center">
                                    <button class="btn btn-secondary btn-sm"> Edit </button>

                                    <button class="btn btn-secondary btn-sm"> Delete </button>

                                </td>
                            </tr>
                        </thead>
                        @endforeach
                    <tbody>
                </table>
            </div>
        </div>

        <div id="News" class="tabcontent">
            <h3>News</h3>
            <p>Some news this fine day!</p>
        </div>

        <div id="Contact" class="tabcontent">
            <h3>Contact</h3>
            <p>Get in touch, or swing by for a cup of coffee.</p>
        </div>

        <div id="About" class="tabcontent">
            <h3>About</h3>
            <p>Who we are and what we do.</p>
        </div>

        <script>
            function openPage(pageName, elmnt, color) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
                }
                document.getElementById(pageName).style.display = "block";
                elmnt.style.backgroundColor = color;
            }

        </script>

    </body>



    </html>



@endsection
