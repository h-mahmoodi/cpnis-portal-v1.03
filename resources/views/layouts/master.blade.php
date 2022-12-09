<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>CPNIS Working Portal</title>
    <link rel="shortcut icon" href="{{ asset('images/cpnis-logo.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- <script src="jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
    @livewireStyles
</head>
<body class="bg-slate-900">


    <style>
        .tags-input {
        display: flex;
        flex-wrap: wrap;
        background-color: #fff;
        border-width: 1px;
        border-radius: .25rem;
        padding-left: .5rem;
        padding-right: 1rem;
        padding-top: .5rem;
        padding-bottom: .25rem;
        }

        /* .select2-container .select2-selection--multiple .select2-selection__rendered {
    display: inline-block!important;
    direction: rtl;
} */

        span.select2.select2-container {
            width: 100%!important;
        }
        .select2-selection {
        border-radius: 5px!important;
        border: 0px solid #d1d5db!important;
    }

        .tags-input-tag {
        display: inline-flex;
        line-height: 1;
        align-items: center;
        font-size: .875rem;
        background-color: #bcdefa;
        color: #1c3d5a;
        border-radius: .25rem;
        user-select: none;
        padding: .25rem;
        margin-right: .5rem;
        margin-bottom: .25rem;
        }

        .tags-input-tag:last-of-type {
        margin-right: 0;
        }

        .tags-input-remove {
        color: #2779bd;
        font-size: 1.125rem;
        line-height: 1;
        }

        .tags-input-remove:first-child {
        margin-right: .25rem;
        }

        .tags-input-remove:last-child {
        margin-left: .25rem;
        }

        .tags-input-remove:focus {
        outline: 0;
        }

        .tags-input-text {
        flex: 1;
        outline: 0;
        padding-top: .25rem;
        padding-bottom: .25rem;
        margin-left: .5rem;
        margin-bottom: .25rem;
        min-width: 10rem;
        }

        .py-16 {
        padding-top: 4rem;
        padding-bottom: 4rem;
    }
    @keyframes mymove {
        0% {background-position-x: 0px;}
        100% {background-position-x: 1000px;}
    }
    </style>


@if (auth()->user())
    <div class=" ">
        @include('layouts.header')
    </div>
@endif
    <div class="p-2 min-h-screen" style="animation: mymove 15s infinite;background-image: url('images/bg.svg');background-size: contain;">
        @yield('content')

    </div>

    @include('sweetalert::alert')


    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                open: false,

                toggle() {
                    this.open = ! this.open
                },
            }))
        })
    </script>

    <script>


        function tagSelect() {
  return {
    open: false,
    textInput: '',
    tags: [],
    init() {
      this.tags = JSON.parse(this.$el.parentNode.getAttribute('data-tags'));
    },
    addTag(tag) {
      tag = tag.trim()
      if (tag != "" && !this.hasTag(tag)) {
        this.tags.push( tag )
      }
      this.clearSearch()
      this.$refs.textInput.focus()
      this.fireTagsUpdateEvent()
    },
    fireTagsUpdateEvent() {
      this.$el.dispatchEvent(new CustomEvent('tags-update', {
        detail: { tags: this.tags },
        bubbles: true,
      }));
    },
    hasTag(tag) {
      var tag = this.tags.find(e => {
        return e.toLowerCase() === tag.toLowerCase()
      })
      return tag != undefined
    },
    removeTag(index) {
      this.tags.splice(index, 1)
      this.fireTagsUpdateEvent()
    },
    search(q) {
      if ( q.includes(",") ) {
        q.split(",").forEach(function(val) {
          this.addTag(val)
        }, this)
      }
      this.toggleSearch()
    },
    clearSearch() {
      this.textInput = ''
      this.toggleSearch()
    },
    toggleSearch() {
      this.open = this.textInput != ''
    }
  }
}
    </script>




    @livewireScripts

</body>
</html>
