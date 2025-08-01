   <div class="mb-3">
        <label for="member_id">Member</label>
        <select name="member_id" class="form-control">
            <option value="">-- Choose Member --</option>
            @foreach($members as $member)
                <option value="{{ $member->id }}" {{ old('member_id', $accomplishment->member_id ?? '') == $member->id ? 'selected' : '' }}>
                    {{ $member->full_name }}
                </option>
            @endforeach
        </select>
        <small class="text-danger" id="error-member_id"></small>
    </div>

    <div class="mb-3">
        <label>Category</label>
        <input type="text" name="category" value="{{ old('category', $accomplishment->category ?? '') }}" class="form-control">
        <small class="text-danger" id="error-category"></small>
    </div>

    <div class="mb-3">
        <label>Event Name</label>
        <input type="text" name="event_name" value="{{ old('event_name', $accomplishment->event_name ?? '') }}" class="form-control">
        <small class="text-danger" id="error-event_name"></small>
    </div>

    <div class="mb-3">
        <label>Level</label>
        <input type="text" name="level" value="{{ old('level', $accomplishment->level ?? '') }}" class="form-control">
        <small class="text-danger" id="error-level"></small>
    </div>

    <div class="mb-3">
        <label>Type</label>
        <input type="text" name="type" value="{{ old('type', $accomplishment->type ?? '') }}" class="form-control">
        <small class="text-danger" id="error-type"></small>
    </div>

    <div class="mb-3">
        <label>Organizer</label>
        <input type="text" name="organizer" value="{{ old('organizer', $accomplishment->organizer ?? '') }}" class="form-control">
        <small class="text-danger" id="error-organizer"></small>
    </div>

    <div class="mb-3">
        <label>Rank</label>
        <input type="text" name="rank" value="{{ old('rank', $accomplishment->rank ?? '') }}" class="form-control">
        <small class="text-danger" id="error-rank"></small>
    </div>

    <div class="mb-3">
        <label>Awards (optional)</label>
        <input type="text" name="awards[type]" value="{{ old('awards.type', $accomplishment->awards['type'] ?? '') }}" class="form-control">
        <small class="text-danger" id="error-awards_type"></small>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" value="{{ old('start_date', $accomplishment->start_date ?? '') }}" class="form-control">
            <small class="text-danger" id="error-start_date"></small>
        </div>
        <div class="col-md-6 mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" value="{{ old('end_date', $accomplishment->end_date ?? '') }}" class="form-control">
            <small class="text-danger" id="error-end_date"></small>
        </div>
    </div>

    <div class="mb-3">
        <label>Barcode Trophy</label>
        <input type="text" name="barcode_trophy" value="{{ old('barcode_trophy', $accomplishment->barcode_trophy ?? '') }}" class="form-control">
        <small class="text-danger" id="error-barcode_trophy"></small>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Street</label>
            <input type="text" name="street" value="{{ old('street', $accomplishment->street ?? '') }}" class="form-control">
            <small class="text-danger" id="error-street"></small>
        </div>
        <div class="col-md-6 mb-3">
            <label>Province</label>
            <input type="text" name="province" value="{{ old('province', $accomplishment->province ?? '') }}" class="form-control">
            <small class="text-danger" id="error-province"></small>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Zip Code</label>
            <input type="text" name="zip_code" value="{{ old('zip_code', $accomplishment->zip_code ?? '') }}" class="form-control">
            <small class="text-danger" id="error-zip_code"></small>
        </div>
        <div class="col-md-6 mb-3">
            <label>Country</label>
            <input type="text" name="country" value="{{ old('country', $accomplishment->country ?? '') }}" class="form-control">
            <small class="text-danger" id="error-country"></small>
        </div>
    </div>

    <div class="mb-3">
        <label>Condition (optional)</label>
        <input type="text" name="condition" value="{{ old('condition', $accomplishment->condition ?? '') }}" class="form-control">
        <small class="text-danger" id="error-condition"></small>
    </div>

    <div class="mb-3">
        <label>Notes (optional)</label>
        <textarea name="notes" class="form-control">{{ old('notes', $accomplishment->notes ?? '') }}</textarea>
        <small class="text-danger" id="error-notes"></small>
    </div>