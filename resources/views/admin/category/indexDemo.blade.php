@php


<tr>
    <td>{{ $key+1 }}</td>
    <td>{{ $category->name }}</td>
    <td><i class="{{ $category->icon_class }}"></i></td>
    <td>{{ str_limit($category->description, 15)}}</td>
    <td>{{ $category->created_at->diffForHumans() }}</td>
    <td>
        <button
            data-toggle="modal"
            data-target="#show-modal"
            data-id="{{ $category->id }}"
            data-name="{{ $category->name }}"
{{--                                                        data-icon="{{ $category->icon_class }}"--}}
            data-description="{{ $category->description }}"
            data-created_at="{{ $category->created_at }}"
            data-updated_at="{{ $category->updated_at }}"
            class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit">
            <i class="icon-eye" ></i>
        </button>

        <a
            data-toggle="modal"
            data-target="#edit-modal"
            data-id="{{ $category->id }}"
            data-name="{{ $category->name }}"
{{--                                                        data-icon="{{ $category->icon_class }}"--}}
            data-description="{{ $category->description }}"
            class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit">
            <i class="icon-pencil" ></i>
        </a>



        <a class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" onclick="showCancelMessage({{ $category->id }}); event.preventDefault();"><i class="icon-trash" ></i></a>
        <form id="delete-data-{{ $category->id }}" action="{{ route('app.category.destroy', $category->id) }}" method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </td>
</tr>

