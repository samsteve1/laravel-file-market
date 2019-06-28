<script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    
    <script>
        var uploadedDocumentMap = {};
        var deleteFile;

        let drop = Dropzone.options.documentDropzone  = {
           createImageThumbnails: false,
           addRemoveLinks: true,
           url: '{{ route('upload.store', $file) }}',
           headers: {
               'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
           },

           success: function (file, response) {
               file.id = response.id;
           },

           removedfile : function (file) {
               deleteFile = file;
                axios.delete('/{{ $file->identifier }}/upload/'+ parseInt(file.id)).catch(function (error) {
                    alert('Deletion faled!, please referesh the page');
                })

                file.previewElement.remove();
            },

            init: function() {
                @foreach($file->uploads as $upload)
                    this.emit('addedfile', {
                        id: '{{ $upload->id }}',
                        name: '{{ $upload->filename }}',
                        size: '{{ $upload->size }}'
                    })
                @endforeach
            },

            deleteFialed: function() {
                this.emit('addedfile', {
                    id: deleteFile.id,
                    name: deleteFile.name,
                    size: deleteFile.size
                })
           },
        };
        
      
        
      
        
    </script>