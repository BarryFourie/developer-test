<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users</title>

        <!-- Fonts -->
        <link rel="stylesheet" id="dashicons-css" href="https://www.everlytic.co.za/wp-includes/css/dashicons.min.css?ver=5.2.9" type="text/css" media="all">
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                height: 100vh;
                margin: 0;
                font: 13px/20px PTSansRegular,Arial,Helvetica,sans-serif;
            }

            .banner-listing{
                width: 100%;
                max-height: calc(100vh / 3);
                height: 100%;
                background-size: 100%;
                background-position: center;
                background-image: url('/images/banner-userlist.jpg')
            }
            
            .container-main{
                height: auto;
                width: 100%;
                padding-top: 106px;
                display: flex;
                flex-direction: column;
            }

            .container-main .toolbar {
                display:flex;
                flex-direction:row;
                width: 100%;
                max-width: 1176px;
                margin: auto;
                justify-content: flex-end;
                margin-bottom: 20px;
            }

            .container-main .toolbar button{
                text-decoration: none;
                display: block;
                padding: 10px;
                background: #000000;
                color: #fff;
                border: 0px;
            }
            
            .container-main table{
                border-collapse: collapse;
                color:#454545;
                width: 100%;
                max-width: 1176px;
                margin: auto;
            }

            .container-main table tr:nth-child(odd){
                background: #ebebeb;
            }

            .container-main table tr:nth-child(even) {
                background: #fff;
            }

            .container-main table td{
                white-space: nowrap;
                padding: 15px;
            }

            .container-main table td.icon{
                width: 100%;
                text-align: right;
            }

            .container-main table td.icon a{
                color: #cc0002
            }


            .modal .modal-container{
                position: fixed;
                display: none;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0,0,0,0.5); 
                z-index: 2; 
            }

            .modal .modal-container.active{
                display: block;
            }

            .modal .modal-container .content{
                 padding: 0px 20px;
                background: #fff;
                position: absolute;
                left:  calc((100vw - 800px)/2);
                width: 800px;
                top: 200px;
            }

            .modal .modal-container .content .header{
                margin-bottom: 20px;
                border-bottom: 1px solid #eaeaea;
            }

            .modal .modal-container .content .header h2{
               font-weight: 400;
            }

            .modal .modal-container .content .form-group label{
                width: 100%;
                color: #0a0a0a;
                display: block;
                margin-bottom: 10px;
                box-sizing: border-box;
            }

            .modal .modal-container .content .form-group input{
                box-sizing: border-box;
                border-radius: 2px;
                border: 1px solid #e0e0e0;
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
            }


            .modal .modal-container .content .footer {
                display: flex;
                margin-bottom: 20px;
                justify-content: flex-end;
            }

            .modal .modal-container .content .footer button, .modal .modal-container .content .footer a{
                display: block;
                padding: 12px;
                margin-left: 20px;
                text-align: center;
                border-radius: 2px;
                min-width: 100px;
                background: #000000;
                color: #fff;
                border: 0px;
                font-weight: bold;
                text-decoration: none;
            }

            .modal .modal-container .content .footer a.secondary{
                background: #fff;
                color: #000000;
            }

        </style>
        <script>
            toggleDeleteModal = function(id = null){
                var element = document.getElementById("delete-modal")
                var form = document.getElementById("delete-form")

                if(id){
                    form.action = '/users/' + id
                }

                element.classList.toggle('active');
            }

            toggleCreateModal = function(){
                var element = document.getElementById("create-modal")
                element.classList.toggle('active');
            }
        </script>
    </head>
    <body>
    <div class="banner-listing">
    </div>
    <div class="container-main">
        <div class="toolbar">
            <button onclick="toggleCreateModal()">Add new user</button>
        </div>
         @section('list')
         @show
    </div>
    <div class="modal">    
        <div class="modal-container" id="delete-modal">
            <div class="content">
                <div class="header">
                    <h2>Confirm delete</h2>
                </div>
                <form method="post" id="delete-form">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <p>Please comfirm that you would like to delete this user.</p>
                    <div class="footer">
                        <button type="button"  onclick="toggleDeleteModal()" class="secondary">Cancel</button>
                        <button type="submit">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="modal-container" id="create-modal">
        <div class="content">
            <div class="header">
            <h2>Add new user</h2>
            </div>
            <form method="post" action="{{ route('users.store') }}">
            {{ csrf_field() }}
                <div class="form-group">    
                    <label for="name">Name:</label>
                    <input type="text" name="name"/>
                </div>

                <div class="form-group">
                    <label for="surname">Surname:</label>
                    <input type="text" name="surname"/>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email"/>
                </div>
                <div class="form-group">
                    <label for="city">Position:</label>
                    <input type="text" name="position"/>
                </div> 
                <div class="footer">
                    <a type="button" href="/users" class="secondary">Cancel</a>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </body>
</html>
