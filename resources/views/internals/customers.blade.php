<? php ?>

<h1>Customers Page</h1>

<ul>
    @foreach($customers as $customer)
        <li> {{$customer}} </li>
    @endforeach

</ul>
