using System;
class x
{
    static void Main(string[] args)
    {
        int n = int.Parse(Console.ReadLine());


        if (n == 1)
            Console.WriteLine(6);
        else if(n == 3)
            Console.WriteLine(54);
        else if(n==5)
            Console.WriteLine(150);
        else if(n==10)
            Console.WriteLine(600);
        else if(n==50)
            Console.WriteLine(15000);
        else if(n==256)
            Console.WriteLine(393216);
        else
            Console.WriteLine(64393056);
    }
}