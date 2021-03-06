<li class="{{ Request::is('admin/home*') ? 'active' : '' }}">
    <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-home"></i><span>Home</span></a>
</li>
@can('read users')
    <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
        <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
    </li>
@endcan
{{--@can('read tags')
    <li class="{{ Request::is('admin/tags*') ? 'active' : '' }}">
        <a href="{!! route('tags.index') !!}"><i
                class="fa fa-tags"></i><span>{{ucfirst(config('settings.tags_label_plural'))}}</span></a>
    </li>
@endcan
@can('viewAny',\App\Document::class)
    <li class="{{ Request::is('admin/documents*') ? 'active' : '' }}">
        <a href="{!! route('documents.index') !!}"><i
                class="fa fa-file"></i><span>{{ucfirst(config('settings.document_label_plural'))}}</span></a>
    </li>
@endcan--}}
@if(auth()->user()->is_super_admin)
    <li class="treeview {{ Request::is('admin/advanced*') ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-info-circle"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('admin/advanced/settings*') ? 'active' : '' }}">
                <a href="{!! route('settings.index') !!}"><i class="fa fa-gear"></i><span>Settings</span></a>
            </li>
            <li class="{{ Request::is('admin/advanced/custom-fields*') ? 'active' : '' }}">
                <a href="{!! route('customFields.index') !!}"><i
                        class="fa fa-file-text-o"></i><span>Custom Fields</span></a>
            </li>
            <li class="{{ Request::is('admin/advanced/file-types*') ? 'active' : '' }}">
                <a href="{!! route('fileTypes.index') !!}"><i class="fa fa-file-o"></i><span>{{ucfirst(config('settings.file_label_singular'))}} Types</span></a>
            </li>
        </ul>
    </li>
@endif

<li class="{{ Request::is('uploadHeaders*') ? 'active' : '' }}">
    <a href="{!! route('uploadHeaders.index') !!}"><i class="fa fa-edit"></i><span>Upload Headers</span></a>
</li>

<li class="{{ Request::is('animalSurveillances*') ? 'active' : '' }}">
    <a href="{!! route('animalSurveillances.index') !!}"><i class="fa fa-edit"></i><span>Animal Surveillances</span></a>
</li>

<li class="{{ Request::is('animalSurveillanceFinals*') ? 'active' : '' }}">
    <a href="{!! route('animalSurveillanceFinals.index') !!}"><i class="fa fa-edit"></i><span>Animal Surveillance Finals</span></a>
</li>

<li class="{{ Request::is('humanSurveillances*') ? 'active' : '' }}">
    <a href="{!! route('humanSurveillances.index') !!}"><i class="fa fa-edit"></i><span>Human Surveillances</span></a>
</li>

<li class="{{ Request::is('humanSurveillanceFinals*') ? 'active' : '' }}">
    <a href="{!! route('humanSurveillanceFinals.index') !!}"><i class="fa fa-edit"></i><span>Human Surveillance Finals</span></a>
</li>

