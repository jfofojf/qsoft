@csrf

<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">

        <x-input.group for="title_field" name="title" text="Название новости">
            <x-input.text id="title_field" name="title" value="{{ old('title', $article->title) }}"/>
        </x-input.group>

        <x-input.group for="description_field" name="description" text="Краткое описание">
            <x-input.text id="description_field" name="description" value="{{ old('description', $article->description) }}"/>
        </x-input.group>

        <x-input.group for="body_field" name="body" text="Детальное описание">
            <x-input.textarea id="body_field" name="body" value="{{ old('body', $article->body) }}"/>
        </x-input.group>

        <x-input.group for="tag_field" name="tags" text="Тэги">
            <x-input.text id="tag_field" name="tags" value="{{ old('tags', $tags ?? '') }}"/>
        </x-input.group>

        <x-input.checkbox text="Опубликовать" value="{{(old('checkbox') == 'on') ? 'checked' : ''}}"/>
    </div>
</div>
