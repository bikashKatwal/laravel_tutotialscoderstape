<ul>
    <li><a href="/">Home</a></li>
    <li><a href="about">About Us</a></li>
    <li><a href="contact">Contact Us</a></li>
    <li><a href="customers">Customers</a></li>
</ul>
<h1>Customers Page</h1>

<ul>
    @foreach($customers as $customer)
        <li> {{$customer}} </li>
    @endforeach

</ul>
