<head>
    <link rel="stylesheet" href="./css/chatbot/chatbot.css">
    <script src="https://kit.fontawesome.com/75c41b6d39.js" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <button id="toggleButton"><i class="fa-solid fa-robot"></i></button>
    <div id="burbuja">
        <div class="wrapper">
            <div class="title">ChatBot "Libreria"</div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p>Hola, ¿cómo puedo ayudarte?</p>
                    </div>
                </div>
            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Escribe algo aquí.." required>
                    <button id="send-btn">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#send-btn").on("click", function() {
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // iniciar el código ajax
                $.ajax({
                    url: './paginas/modelo/chatbot.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function(result) {
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                        $(".form").append($replay);
                        // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });

        document.getElementById("data").addEventListener("keyup", function(event) {
            if (event.keyCode === 13) { 
                event.preventDefault();
                document.getElementById("send-btn").click();
            }
        });

        document.getElementById("toggleButton").addEventListener("click", function() {
            var div = document.getElementById("burbuja");
            if (div.style.display === "none" || div.style.display === "") {
                div.style.display = "block"; 
                div.style.position = "fixed"; // Ajusta la posición al mostrar
                div.style.zIndex = "9999"; // Ajusta el z-index al mostrar
            } else {
                div.style.display = "none";
            }
        });
    </script>
</body>