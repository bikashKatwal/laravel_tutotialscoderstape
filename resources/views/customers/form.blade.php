@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value="{{ old('name')  ?? $customer->name }}"/>
</div>

<div class="form-group ">
    <label for="Email">Email</label>
    <input type="text" class="form-control" name="email" value="{{ old('email') ?? $customer->email }}"/>
</div>

<div class="form-group ">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>
        @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{$activeOptionKey}}" {{$customer->active== $activeOptionValue?'selected':''}}>
                {{$activeOptionValue}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group ">
    <label for="company_id">Company</label>
    <select name="company_id" id="company_id" class="form-control">
        <option value="" disabled>Select company</option>
        @foreach($companies as $company)
            <option value="{{$company->id}}" {{$company->id == $customer->company_id ? 'selected' : '' }}>
                {{$company->name}}
            </option>
        @endforeach

    </select>
</div>
