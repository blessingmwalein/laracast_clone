<template>
  <div
    class="modal fade"
    id="createLesson"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create new lesson</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              placeholder="Lesson title"
              v-model="lesson.title"
            />
          </div>
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              placeholder="Youtube video id"
              v-model="lesson.vedio_id"
            />
          </div>
          <div class="form-group">
            <input
              type="number"
              class="form-control"
              placeholder="Episode number"
              v-model="lesson.episode_number"
            />
          </div>

          <div class="form-group">
            <textarea class="form-control" v-model="lesson.description" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group" style="text-align:right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button
              type="button"
              class="btn btn-primary"
              @click="updateLesson"
              v-if="editing"
            >Update lesson</button>

            <button type="button" class="btn btn-primary" @click="createLesson" v-else>Save lesson</button>
          </div>
        </div>
        <div class="modal footer"></div>
      </div>
    </div>
  </div>
</template>
<script>
import Axios from "axios";

class Lesson {
  constructor(lesson) {
    this.title = lesson.title || "";
    this.description = lesson.description || "";
    this.vedio_id = lesson.vedio_id || "";
    this.episode_number = lesson.episode_number || "";
  }
}
export default {
  mounted() {
    this.$parent.$on("create_new_lesson", (seriesId) => {
      this.seriesId = seriesId;
      this.editing = false;

      this.lesson = new Lesson({});
      console.log("hello parent, we are creating lesson");
      $("#createLesson").modal();
    });

    this.$parent.$on("edit_lesson", ({ lesson, seriesId }) => {
      this.editing = true;
      this.seriesId = seriesId;
      this.lesson = new Lesson(lesson);
      this.lessonId = lesson.id;

      $("#createLesson").modal();
    });
  },

  data() {
    return {
      lesson: {},
      seriesId: "",
      editing: false,
      lessonId: null,
    };
  },
  methods: {
    createLesson() {
      Axios.post(`/admin/${this.seriesId}/lessons`, this.lesson)
        .then((response) => {
          this.$parent.$emit("lesson_created", response.data);
          $("#createLesson").modal("hide");
        })
        .catch((error) => {
          window.handleErrors(error);
        });
    },
    updateLesson() {
      Axios.put(`/admin/${this.seriesId}/lessons/${this.lessonId}`, this.lesson)
        .then((response) => {
          $("#createLesson").modal("hide");
          this.$parent.$emit("lesson_updated", response.data);
          console.log(response);
        })
        .catch((error) => {
          window.handleErrors(error);
        });
      console.log("updating");
    },
  },
};
</script>
