@extends('layouts.student')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <h4 class="text-center mb-8 text-4xl md:text-5xl font-bold">Beck Anxiety Inventory (BAI)</h4>  
    </div>

    <form id="myForm" method="POST" action="{{ route('student.assessments.store') }}">
        @csrf 
        <div class="relative overflow-x-auto rounded-lg shadow-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-black uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3"> Anxiety Symptoms</th>
                        <th scope="col" class="text-center px-6 py-3"> Not at all<br>(0)</th>
                        <th scope="col" class="text-center px-6 py-3"> Mild, but it didn't bother me much<br>(1)</th>
                        <th scope="col" class="text-center px-6 py-3"> Moderately, it wasn't pleasant at times<br>(2)</th>   
                        <th scope="col" class="text-center px-6 py-3"> Severely, it bothered me a lot<br>(3)</th>
                    </tr>
                </thead>
                <tbody class="text-black "id="questionsBody">
                    <!-- Questions rows will be added here dynamically by JavaScript -->
                </tbody>
            </table>
        </div>

        <div class="text-right mt-4 ml-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-700 mb-6">
                View Result
            </button>
        </div>
        <input type="hidden" name="total_score" id="totalScoreInput">
    </form>
  
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
   $(document).ready(function () {
    const questions = [
        "Numbness or Tingling", "Feeling hot", "Wobbliness in legs", "Unable to relax",
        "Fear of worst happening", "Dizzy or Lightheaded", "Heart pounding/racing",
        "Unsteady", "Terrified or Afraid", "Nervous", "Feeling of choking",
        "Hands trembling", "Shaky/Unsteady", "Fear of losing control",
        "Difficulty of breathing", "Fear of dying", "Scared", "Indigestion",
        "Faint", "Hot flushes or chills", "Face flushed"
    ];

    let tbody = $("#questionsBody");
    questions.forEach((question, index) => {
        tbody.append(`
            <tr>
                <td class='border-b border-gray-300 px-2 sm:px-4 py-3'>${question}</td>
                <td class='border-b border-gray-300 text-center px-2 sm:px-4 py-3'><input type='radio' name='answers[${index}]' value='0' class='answer' required></td>
                <td class='border-b border-gray-300 text-center px-2 sm:px-4 py-3'><input type='radio' name='answers[${index}]' value='1' class='answer' required></td>
                <td class='border-b border-gray-300 text-center px-2 sm:px-4 py-3'><input type='radio' name='answers[${index}]' value='2' class='answer' required></td>
                <td class='border-b border-gray-300 text-center px-2 sm:px-4 py-3'><input type='radio' name='answers[${index}]' value='3' class='answer' required></td>
            </tr>
        `);
    });

    $('#myForm').submit(function (event) {
        let totalScore = 0;
        let allAnswered = true;

        for (let i = 0; i < 21; i++) {
            let value = $(`input[name='answers[${i}]']:checked`).val();
            if (value === undefined) {
                allAnswered = false;
                break;
            }
            totalScore += parseInt(value);
        }

        if (!allAnswered) {
            alert('Please answer all questions.');
            event.preventDefault();
        } else {
            $('#totalScoreInput').val(totalScore);
        }
    });
});

</script>

@endsection