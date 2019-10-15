
import React from 'react'
import { StyleSheet, View, Text, Image } from 'react-native'


class EquipeItem extends React.Component {

  render() {
    const equipe=this.props.equipe
    const image = this.props.equipe.picture
    console.log(image);
    return (
      <View style={styles.main_container}>
        <View style={styles.image_container}>
          <Image
            style={styles.image}
            source={require("../Images/ludo.jpg")}
          />
        </View>
        <View style={styles.content_container}>
          <View style={styles.name_container}>
            <Text style={styles.firstname_text}>{equipe.firstname}</Text>
            <Text style={styles.name_text}>{equipe.name}</Text>
          </View>
          <View style={styles.statut_container}>
            <Text style={styles.status_text}>{equipe.status}</Text>
          </View>
        </View>
      </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    height: 75,
    marginTop:5,
    flexDirection: 'row'
  },
  image_container:{

  },
  image: {
    width: 50,
    height: 50,
    margin: 5
  },
  content_container: {
    flex: 1,
    margin: 5,
    marginLeft:15
  },
  name_container: {
    flex: 3,
    flexDirection: 'row'
  },
  firstname_text: {
    fontSize: 20,
    color: 'white',
    height:30

  },
  name_text: {
    fontSize: 20,
    color: 'white',
    paddingLeft:5,
    height:30
  },
  statut_container: {
    flex: 7
  },
  status_text: {
    fontStyle: 'italic',
    color: '#ff5733',
    marginTop:5
  }
})

export default EquipeItem
