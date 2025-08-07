<div class="row">
    <div class="col-md-6 mb-3">
        <label for="member_id">Member</label>
        <select name="member_id" class="form-control" id="member_id">
            <option value="">-- Choose Member --</option>
            @foreach($members as $member)
                <option value="{{ $member->id }}" {{ old('member_id', $accomplishment->member_id ?? '') == $member->id ? 'selected' : '' }}>
                    {{ $member->full_name }}
                </option>
            @endforeach
        </select>
        <small class="text-danger" id="error-member_id"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="category" class="form-label">Category</label>
        <input id="category" type="text" name="category" value="{{ old('category', $accomplishment->category ?? '') }}" class="form-control">
        <small class="text-danger" id="error-category"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="event_name" class="form-label">Event Name</label>
        <input id="event_name" type="text" name="event_name" value="{{ old('event_name', $accomplishment->event_name ?? '') }}" class="form-control">
        <small class="text-danger" id="error-event_name"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="level" class="form-label">Level</label>
        <input id="level" type="text" name="level" value="{{ old('level', $accomplishment->level ?? '') }}" class="form-control">
        <small class="text-danger" id="error-level"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="type" class="form-label">Type</label>
        <input id="type" type="text" name="type" value="{{ old('type', $accomplishment->type ?? '') }}" class="form-control">
        <small class="text-danger" id="error-type"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="organizer" class="form-label">Organizer</label>
        <input id="organizer" type="text" name="organizer" value="{{ old('organizer', $accomplishment->organizer ?? '') }}" class="form-control">
        <small class="text-danger" id="error-organizer"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="rank" class="form-label">Rank</label>
        <input id="rank" type="text" name="rank" value="{{ old('rank', $accomplishment->rank ?? '') }}" class="form-control">
        <small class="text-danger" id="error-rank"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="awards" class="form-label">Awards (optional)</label>
        <input id="awards" type="text" name="awards[type]" value="{{ old('awards.type', $accomplishment->awards['type'] ?? '') }}" class="form-control">
        <small class="text-danger" id="error-awards_type"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input id="start_date" type="date" name="start_date" value="{{ old('start_date', $accomplishment->start_date ?? '') }}" class="form-control">
        <small class="text-danger" id="error-start_date"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input id="end_date" type="date" name="end_date" value="{{ old('end_date', $accomplishment->end_date ?? '') }}" class="form-control">
        <small class="text-danger" id="error-end_date"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="barcode_trophy" class="form-label">Barcode Trophy</label>
        <input id="barcode_trophy" type="text" name="barcode_trophy" value="{{ old('barcode_trophy', $accomplishment->barcode_trophy ?? '') }}" class="form-control">
        <small class="text-danger" id="error-barcode_trophy"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="street" class="form-label">Street</label>
        <input id="street" type="text" name="street" value="{{ old('street', $accomplishment->street ?? '') }}" class="form-control">
        <small class="text-danger" id="error-street"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="province" class="form-label">Province</label>
        <input id="province" type="text" name="province" value="{{ old('province', $accomplishment->province ?? '') }}" class="form-control">
        <small class="text-danger" id="error-province"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="zip_code" class="form-label">Zip Code</label>
        <input id="zip_code" type="text" name="zip_code" value="{{ old('zip_code', $accomplishment->zip_code ?? '') }}" class="form-control">
        <small class="text-danger" id="error-zip_code"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="country" class="form-label">Country</label>
        <input id="country" type="text" name="country" value="{{ old('country', $accomplishment->country ?? '') }}" class="form-control">
        <small class="text-danger" id="error-country"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="condition" class="form-label">Condition (optional)</label>
        <input id="condition" type="text" name="condition" value="{{ old('condition', $accomplishment->condition ?? '') }}" class="form-control">
        <small class="text-danger" id="error-condition"></small>
    </div>

    <div class="col-md-6 mb-3">
        <label for="notes" class="form-label">Notes (optional)</label>
        <textarea id="notes" name="notes" class="form-control">{{ old('notes', $accomplishment->notes ?? '') }}</textarea>
        <small class="text-danger" id="error-notes"></small>
    </div>
</div>