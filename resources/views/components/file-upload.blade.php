<div class="file-drop-zone border rounded p-4 text-center"
     data-name="{{ $name }}"
     contenteditable="true"
     tabindex="0"
     spellcheck="false"
     style="user-select: none;">

    <p class="text-muted small">Drag, click or <strong>right-click > Paste</strong> an image</p>

    <input type="file" name="{{ $name }}" accept="image/*" hidden>
    <div class="preview mt-2"></div>
</div>
