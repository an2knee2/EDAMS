@extends('layouts.student')

@section('content')
<div class="container mx-auto mt-8 px-4 sm:px-6 md:px-8">
    <h4 class="text-center mt-20 mb-8 text-4xl md:text-5xl font-bold">Beck Anxiety Inventory (BAI)</h4>  
</div>

<form id="myForm">
    @csrf
    <div class="mx-6 text-center overflow-x-auto">
        <table class="table-auto border-collapse border border-gray-400 w-full text-left shadow-md mb-8 min-w-full">
            <thead>
                <tr>
                    <th class="bg-blue-100 border border-gray-400 px-2 sm:px-4 py-2">Anxiety Symptoms</th>
                    <th class="bg-blue-100 border border-gray-400 px-2 sm:px-4 py-2">Not At All</th>
                    <th class="bg-blue-100 border border-gray-400 px-2 sm:px-4 py-2">Mild, but it didn't bother me much</th>
                    <th class="bg-blue-100 border border-gray-400 px-2 sm:px-4 py-2">Moderately, it wasn't pleasant at times</th>
                    <th class="bg-blue-100 border border-gray-400 px-2 sm:px-4 py-2">Severely, it bothered me a lot</th>
                </tr>
            </thead>
            <tbody id="questionsBody">
                <!-- Questions rows will be added here dynamically by JavaScript -->
            </tbody>
        </table>
    </div>

    <!-- Submit button to view results after completing assessment -->
    <div class="text-right mr-6">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-700 mb-6">
            View Result
        </button>
    </div>

    <!-- Display total score -->
    <div class="text-center mt-4">
        <p id="totalScore" class="text-xl font-bold"></p>
    </div>
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
                <td class='border px-2 sm:px-4 py-2'>${question}</td>
                <td class='border px-2 sm:px-4 py-2'><input type='radio' name='answers[${index}]' value='0' class='answer' required></td>
                <td class='border px-2 sm:px-4 py-2'><input type='radio' name='answers[${index}]' value='1' class='answer' required></td>
                <td class='border px-2 sm:px-4 py-2'><input type='radio' name='answers[${index}]' value='2' class='answer' required></td>
                <td class='border px-2 sm:px-4 py-2'><input type='radio' name='answers[${index}]' value='3' class='answer' required></td>
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
            $('#totalScore').text('Total Score: ' + totalScore);
        }
    });
});

</script>

@endsection