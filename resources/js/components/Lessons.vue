<template>
  <div>
    <div class="form-group">
      <button
        class="btn btn-bold btn-block btn-primary"
        type="submit"
        @click="createNewLesson"
      >Create Lesson</button>
    </div>
    <ul class="list-group">
      <li
        class="list-group-item d-flex justify-content-between"
        v-for="(lesson, key) in lessons"
        :key="lesson.id"
      >
        <p>{{ lesson.title }}</p>
        <p>
          <button class="btn btn-primary btn-xs" @click.prevent="editLesson(lesson)">Edit</button>
          <button class="btn btn-danger btn-xs" @click.prevent="deleteLesson(lesson.id, key)">Delete</button>
        </p>
      </li>
    </ul>

    <create-lesson></create-lesson>
  </div>
</template>
<script>
import Axios from "axios";
import CreateLesson from "./children/CreateLesson";
export default {
  props: ["default_lessons", "series_id"],
  components: {
    CreateLesson,
  },
  mounted() {
    this.$on("lesson_created", function (lesson) {
      window.noty({
        message: "Lesson created successfully",
        type: "success",
      });
      this.lessons.push(lesson);
    });

    this.$on("lesson_updated", (lesson) => {
      let lessonIndex = this.lessons.findIndex((l) => {
        return lesson.id == l.id;
      });

      this.lessons.splice(lessonIndex, 1, lesson);
    });
  },
  data() {
    return {
      lessons: JSON.parse(this.default_lessons),
    };
  },

  methods: {
    createNewLesson() {
      this.$emit("create_new_lesson", this.series_id);
    },
    editLesson(lesson) {
      let seriesId = this.series_id;
      this.$emit("edit_lesson", { lesson, seriesId });
    },
    deleteLesson(id, key) {
      if (confirm("Are you sure you wanna delete ?")) {
        Axios.delete(`/admin/${this.series_id}/lessons/${id}`)
          .then((response) => {
            this.lessons.splice(key, 1);
            window.noty({
              message: "Lesson deleted successfully",
              type: "danger",
            });
          })
          .catch((error) => {
            window.handleErrors(error);
          });
      }
    },
  },
};
</script>
