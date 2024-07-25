<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style3.css">
    <script>
        function goForum(event) {
            var checkbox = document.getElementById("agree");
            if (!checkbox.checked) {
                alert("You must agree to the rules to proceed!");
                event.preventDefault();
            } else {
                document.getElementById("rulesForm").submit();
            }
        }
    </script>
</head>
<body>
    <div class="containerrules">
        <h1>Rules</h1>
        <p>
            1- Always show respect to others, regardless of their background, beliefs, or opinions. Treat others as you would like to be treated.
            <br>
            2- Use polite language and manners in all interactions. Say "please," "thank you," "excuse me," and "sorry" when appropriate.
            <br>
            3- Be on time for appointments and meetings. Respect other people's time by being punctual.
            <br>
            4- Listen actively and attentively when someone is speaking. Do not interrupt and show genuine interest in what they are saying.
            <br>
            5- Be truthful in your words and actions. Honesty builds trust and strengthens relationships.
            <br>
            6- Show kindness and compassion to others. Small acts of kindness can make a big difference in someone's day.
            <br>
            7- Be considerate of others' feelings and needs. Think about how your actions may affect those around you.
            <br>
            8- If you make a mistake or hurt someone, apologize sincerely. Taking responsibility for your actions shows maturity and respect.
            <br>
            9- Do not spread rumors or talk negatively about others behind their backs. Gossip can harm reputations and relationships.
            <br>
            10- Include others and make an effort to ensure everyone feels welcome and valued. Embrace diversity and encourage an inclusive environment.
        </p>
        <form id="rulesForm" action="accept_rules.php" method="post">
            <input type="checkbox" class="agree" id="agree" name="agreebox" required>
            <label for="agree">I agree with the rules above.</label>
            <br>
            <button type="button" class="btn3" id="btn3" onclick="goForum()">Approve</button>
        </form>
    </div>
</body>
</html>
