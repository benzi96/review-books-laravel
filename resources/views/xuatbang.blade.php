<!DOCTYPE html>
<html>
     <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: top;
            }

            .flat-table {
                display: block;
                  font-family: sans-serif;
                  -webkit-font-smoothing: antialiased;
                  font-size: 150%;
                  overflow: auto;
                  width: auto;
                
  
                    }
            
              th {
                background-color: rgb(112, 196, 105);
                color: white;
                font-weight: normal;
                padding: 20px 30px;
                text-align: center;
                  border: 1px solid black;
              }
              td {
                background-color: rgb(238, 238, 238);
                color: rgb(111, 111, 111);
                padding: 20px 30px;
                  border: 1px solid black;
              }
            tr{
                border: 1px solid black;
            }
        </style>
    </head>
     <body>
        <div class="container">
            <div class="content">
                <table class="flat-table">
                    <tbody>
                    <?php
                        echo '<tr>';
                            echo '<th>ID</th>';
                            echo '<th>Tên tài khoản</th>';
                            echo '<th>Email</th>';
                            echo '<th>Mật khẩu</th>';
                        echo '</tr>';
                        foreach ($users as $user) {
                        echo '<tr>';
                            echo '<td>'.$user->id.'</td>';
                            echo '<td>'.$user->name.'</td>';
                            echo '<td>'.$user->email.'</td>';
                            echo '<td>'.$user->password.'</td>';
                        echo '</tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>