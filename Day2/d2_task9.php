<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>صفحة عرض النتيجة</h2>

        <div>
            <label for="studentName">أدخل اسم الطالب:</label>
            <input type="text" id="studentName">
            <span id="nameDisplay"></span>
        </div>

        <button id="showResultButton">أظهر النتيجة</button>

        <div id="resultDisplay">
        </div>
    </div>

    <script>
        
        const studentNameInput = document.getElementById('studentName');
        const nameDisplaySpan = document.getElementById('nameDisplay');
        const showResultButton = document.getElementById('showResultButton');
        const resultDisplayDiv = document.getElementById('resultDisplay');

       
        studentNameInput.addEventListener('input', () => {
            nameDisplaySpan.textContent = studentNameInput.value ? `مرحباً يا ${studentNameInput.value}...` : '';
            
            resultDisplayDiv.style.display = 'none';
        });

        
        showResultButton.addEventListener('click', () => {
            const studentName = studentNameInput.value.trim(); 

            if (studentName === '') {
                
                resultDisplayDiv.textContent = 'الرجاء إدخال اسم الطالب أولاً.';
                resultDisplayDiv.style.backgroundColor = '#ffe0b2'; 
                resultDisplayDiv.style.borderColor = '#ffcc80';
                resultDisplayDiv.style.color = '#e65100';
                resultDisplayDiv.style.display = 'block';
            } else {
               
                const resultMessage = `مرحباً يا ${studentName}، نتيجتك = 90%.`;

                
                resultDisplayDiv.textContent = resultMessage;
                resultDisplayDiv.style.backgroundColor = '#e9f7ef'; 
                resultDisplayDiv.style.borderColor = '#c8e6c9';
                resultDisplayDiv.style.color = '#28a745';
                resultDisplayDiv.style.display = 'block'; 
            }
        });
    </script>
</body>

</html>