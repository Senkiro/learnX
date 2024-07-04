<form action="{{ route('student_dashboard.index') }}">
    <div class="filter-wrapper container">
        <div class="perpage">
            @php
                $perpage = request('perpage') ?: old('perpage');
            @endphp
            <select name="perpage" class="form-control input-sm perpage filter mr10">
                @for($i = 6; $i <= 100; $i += 3)
                    <option {{ $perpage == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }} Bản ghi</option>
                @endfor
            </select>
        </div>
        <div class="action">
            <div class="input-group">
                <input
                    type="text"
                    name="keyword"
                    value="{{ request('keyword') ?: old('keyword') }}"
                    placeholder="Nhập từ khóa"
                    class="form-control">
                <span class="input-group-btn">
                            <button type="submit" name="search" value="search"
                                    class="btn btn-primary mb0 btn-sm"> Tìm kiếm
                            </button>
                        </span>
            </div>
        </div>
    </div>
</form>
