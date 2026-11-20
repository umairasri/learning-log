# Check My Understanding on PHP Object Oriented Programming

1. What is the difference between a class and an object?
- Class is a blueprint; defines what data a thing holds and what it can do
- Object is a real instance built from that blueprint at runtime.
- Sale is class
- new Sale('Coffee', 3, 4.50) creates one object

2. Why is Sale::total() a better place for the total rule than the loop in Day 5?
- In Day 5, the formula quantity * price lived inside the loop. If the rule changed (e.g adding tax or discount), need to find every place that did the calculation.
- In Day 6, the rule lives in Sale::total() function. Any code that need a sale's total calls that one method. So just change it at one place.

3. What would you change to print the report to a file instead of the console, and which file would you need to touch?
- Create a new class, such as FilePrinter, that implements Printer, and write the report to a file inside its print() method.
- Then change the main.php to create FilePrinter instead of a ConsolePrinter. your don't touch Sale, SalesReport, or the Printer interface, because they don't know or care where output goes.

4. Explain private, namespace and interface in PHP
- private -> applies for both object and method. only visible within that class only
- namespace -> a folder name for that code; LearningLog namespace means that particular class is in the LearningLog group. a file with same name will be differentiate by the namespace group.
- interface -> a contract on what class must do
    - Problem: main.php creates a ConsolePrinter(line 33 main.php) and calls print(). Tomorrow you want to print to a FILE instead of CONSOLE. If main.php is written arount ConsolePrinter specifically, you have to rewrite the main.php every time you add and output
    - Fix: The PRINTER interface(Printer.php) says: "any printer must have print() method that takes a SalesReport." It says nothing about how printing works. ConsolePrinter and a future FilePrinter both promise to follow the rule.
    - Analogy: A power socket is an INTERFACE. The plug shape is the contract. A lamp, laptop charger, and a kettle all use it, and the wall doesn't care which device you plug in. 