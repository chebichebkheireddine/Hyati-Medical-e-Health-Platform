@props(['specializations', 'doctors', 'wilaya', 'organization', 'users'])
<div class="row">
    <div class="col-12">
        <x-admin.doctor.doctor-add :users="$users" :specializations="$specializations" :doctors="$doctors" :wilaya="$wilaya"
            :organization="$organization">
        </x-admin.doctor.doctor-add>
    </div>
