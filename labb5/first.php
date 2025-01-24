<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<style>
    body {
        background-color: #e3f2fd;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #333;
    }

    h2 {
        font-size: 28px;
        margin: 20px;
        text-align: center;
        color: #1e88e5;
        line-height: 1.5;
    }

    .section {
        display: none;
        margin: 20px auto;
        padding: 20px;
        width: 80%;
        max-width: 900px;
        background-color: #ffffff;
        border: 2px solid #90caf9;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .section button {
        font-size: 18px;
        margin: 10px;
        padding: 10px 20px;
        border: 1px solid #1976d2;
        border-radius: 5px;
        background-color: #bbdefb;
        color: #0d47a1;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .section button:hover {
        background-color: #90caf9;
    }

    .start-button {
        font-size: 24px;
        padding: 15px 30px;
        margin: 20px;
        background-color: #42a5f5;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .start-button:hover {
        background-color: #1e88e5;
    }

    .test-button {
        font-size: 20px;
        padding: 15px 30px;
        margin: 20px auto;
        background-color: #66bb6a;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .test-button:hover {
        background-color: #388e3c;
    }

    button {
        font-family: Arial, sans-serif;
    }
</style>
</head>
<body>
    <h2>Här kommer det första steget i Tigrijna-lärandet, nämligen bokstäver med ljud och deras olika mönster.</h2>

    <button id="start" class="start-button">B--><br>Click</button>

    <div id="bf" class="section">
        <audio src="audio/be.mp3" id="bes"></audio>
        <button id="be">በ 🔊<br>Be</button>

        <audio src="audio/bu.mp3" id="bus"></audio>
        <button id="bu">ቡ 🔊<br>Bu</button>

        <audio src="audio/bi.mp3" id="bis"></audio>
        <button id="bi">ቢ 🔊<br>Bi</button>

        <audio src="audio/ba.mp3" id="bas"></audio>
        <button id="ba">ባ 🔊<br>Ba</button>

        <audio src="audio/bie.mp3" id="bies"></audio>
        <button id="bie">ቤ 🔊<br>Bie</button>

        <audio src="audio/bh.mp3" id="bhs"></audio>
        <button id="bh">ብ 🔊<br>Bh</button>

        <audio src="audio/bo.mp3" id="bos"></audio>
        <button id="bo">ቦ 🔊<br>Bo</button>
    </div>

    <button id="start1" class="start-button" style="display:none;">L--></button>

    <div id="lf" class="section">
        <button id="le">ለ 🔊<br>Le</button>
        <button id="lu">ሉ 🔊<br>Lu</button>
        <button id="li">ሊ 🔊<br>Li</button>
        <button id="la">ላ 🔊<br>La</button>
        <button id="lie">ሌ 🔊<br>Lie</button>
        <button id="l">ል 🔊<br>Lh</button>
        <button id="lo">ሎ 🔊<br>Lo</button>
    </div>

    <button id="start2" class="start-button" style="display:none;">S--></button>

    <div id="sf" class="section">
        <button id="se">ሰ 🔊<br>Se</button>
        <button id="su">ሱ 🔊<br>Su</button>
        <button id="si">ሲ 🔊<br>Si</button>
        <button id="sa">ሳ 🔊<br>Sa</button>
        <button id="sie">ሴ 🔊<br>Sie</button>
        <button id="s">ስ 🔊<br>Sh</button>
        <button id="so">ሶ 🔊<br>So</button>
    </div>

    <button id="start3" class="start-button" style="display:none;">K--></button>

    <div id="kf" class="section">
        <button id="ke">ከ 🔊<br>Ke</button>
        <button id="ku">ኩ 🔊<br>Ku</button>
        <button id="ki">ኪ 🔊<br>Ki</button>
        <button id="ka">ካ 🔊<br>Ka</button>
        <button id="kie">ኬ 🔊<br>Kie</button>
        <button id="k">ክ 🔊<br>Kh</button>
        <button id="ko">ኮ 🔊<br>Ko</button>

        <a href="fraga.php">
            <button id="test1" class="test-button">Click here for short test</button>
        </a>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("bf").style.display = "none";
            document.getElementById("lf").style.display = "none";
            document.getElementById("sf").style.display = "none";
            document.getElementById("kf").style.display = "none";

            document.getElementById("start").addEventListener("click", function () {
                document.getElementById("bf").style.display = "block";
                document.getElementById("start1").style.display = "block";
            });

            document.getElementById("start1").addEventListener("click", function () {
                document.getElementById("lf").style.display = "block";
                document.getElementById("start2").style.display = "block";
            });

            document.getElementById("start2").addEventListener("click", function () {
                document.getElementById("sf").style.display = "block";
                document.getElementById("start3").style.display = "block";
            });

            document.getElementById("start3").addEventListener("click", function () {
                document.getElementById("kf").style.display = "block";
            });

            const buttons = document.querySelectorAll("button");
            buttons.forEach(button => {
                button.addEventListener("click", function () {
                    const audioId = this.id + "s";
                    const audio = document.getElementById(audioId);
                    if (audio) {
                        audio.play();
                    }
                });
            });
        });
    </script>
</body>
</html>
