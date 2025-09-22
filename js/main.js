document.getElementById('calculate-btn').addEventListener('click',function(){
    let grades=document.querySelectorAll('.subject-grade');
    let totalGrades = 0;
    let subjectsCount = 0;
    let isValid = true;
    grades.forEach(function(input) {
                let grade = parseFloat(input.value);
                if (isNaN(grade) || grade < 0 || grade > 100 || input.value === '') {
                    isValid = false;
                    alert('الرجاء إدخال درجات صحيحة بين 0 و 100 لجميع المواد.');
                    return;
                }
                totalGrades += grade;
                subjectsCount++;
});
 if (isValid && subjectsCount > 0) {
                let average = (totalGrades / subjectsCount).toFixed(2);
                document.getElementById('result').innerHTML = `معدلك هو: ${average} / 100`;
            } else if (subjectsCount === 0) {
                 document.getElementById('result').innerHTML = `لا يوجد مواد لحساب المعدل.`;
            }
        });