<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

<div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Add Transaction</h2>
    <form id="transactionForm" method="POST" action="/transactions">
        @csrf
        <div class="mb-4">
            <label for="transactionAmount" class="block text-gray-700 font-bold mb-2">Amount:</label>
            <input type="number" id="transactionAmount" name="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="transactionType" class="block text-gray-700 font-bold mb-2">Type:</label>
            <select id="transactionType" name="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Add Transaction</button>
    </form>
</div>

<div class="bg-white p-8 rounded shadow-md w-full max-w-2xl mt-8 ml-16">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Transaction History</h2>
    <table class="min-w-full bg-white border rounded overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border-b text-left text-gray-700">Date</th>
                <th class="py-2 px-4 border-b text-left text-gray-700">Amount</th>
                <th class="py-2 px-4 border-b text-left text-gray-700">Type</th>
            </tr>
        </thead>
        <tbody id="transactionTableBody">
            @foreach ($transactions as $transaction)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $transaction->date }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->amount }}</td>
                    <td class="py-2 px-4 border-b">{{ $transaction->type }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="bg-gray-200">
            <tr>
                <td colspan="2" class="py-2 px-4 border-t font-bold text-gray-700">Balance:</td>
                <td id="balanceCell" class="py-2 px-4 border-t font-bold text-gray-700">{{ $balance }}</td>
            </tr>
        </tfoot>
    </table>
</div>

</body>
</html>
