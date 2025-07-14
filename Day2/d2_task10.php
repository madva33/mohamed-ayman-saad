<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1> أظهر النتيجة </h1> <div>
            <label for="gradeInput">أدخل الدرجة (من 0 إلى 100):</label>
            <input type="number" id="gradeInput" min="0" max="100" placeholder="مثال: 85">
        </div>

        <button id="calculateButton">احسب التقدير</button>

        <div id="gradeResult">
            </div>
    </div>

    <script>
        const gradeInput = document.getElementById('gradeInput');
        const calculateButton = document.getElementById('calculateButton');
        const gradeResultDiv = document.getElementById('gradeResult');


        function getGrade(score) {
            if (score >= 90 && score <= 100) {
                return { text: 'ممتاز', class: 'excellent' };
            } else if (score >= 80 && score < 90) {
                return { text: 'جيد جداً', class: 'very-good' };
            } else if (score >= 65 && score < 80) {
                return { text: 'جيد', class: 'good' };
            } else if (score >= 0 && score < 65) {
                return { text: 'ضعيف', class: 'poor' };
            } else {
                return { text: 'درجة غير صالحة', class: 'error' };
            }
        }


        calculateButton.addEventListener('click', () => {
            const score = parseInt(gradeInput.value); 
            gradeResultDiv.className = '';
            gradeResultDiv.style.display = 'block';

      
            if (isNaN(score) || score < 0 || score > 100) {
                gradeResultDiv.textContent = 'الرجاء إدخال درجة صحيحة بين 0 و 100.';
                gradeResultDiv.classList.add('error');
            } else {
                const { text, class: className } = getGrade(score);
                gradeResultDiv.textContent = `التقدير: ${text}`;
                gradeResultDiv.classList.add(className);
            }
        });
    </script>
</body>
</html>